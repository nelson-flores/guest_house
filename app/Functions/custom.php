<?php

use App\Models\Admin;
use App\Models\Currency;
use App\Models\Module;
use App\Models\Scholarship;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use phputil\extenso\Extenso;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * @author Dotanin Dev <dotanindev@gmail.com>
 * @return App\Models\User
 */
if (!function_exists('user')) {
    function user(): User|null
    {
        return !Auth::guard('web')->check() ? null : Auth::guard('web')->user();
    }
}



function toSnakeCase(string $text): string
{
    // Remove acentos
    $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);

    // Converte para minúsculas
    $text = strtolower($text);

    // Remove caracteres especiais
    $text = preg_replace('/[^a-z0-9\s]/', '', $text);

    // Substitui espaços por underscore
    $text = preg_replace('/\s+/', '_', trim($text));

    return $text;
}


/**
 * @author Dotanin Dev <dotanindev@gmail.com>
 * @return App\Models\Admin
 */
if (!function_exists('admin')) {
    function admin(): Admin|null
    {
        return !Auth::guard('admin')->check() ? null : Auth::guard('admin')->user();
    }
}


/**
 * @author Dotanin Dev <dotanindev@gmail.com>
 * @return bool
 */
if (!function_exists('can')) {
    function can(string $permission): bool
    {
        return Gate::allows($permission);
    }
}

/**
 * @author Dotanin Dev <dotanindev@gmail.com>
 * @return array
 */
if (!function_exists('modulePermissions')) {
    function modulePermissions(string $module): array
    {
        return Module::query()->where('code', $module)
            ->first()->permissions->lazy()
            ->map(function ($permission) {
                return $permission->code;
            })->toArray();
    }
}




/**
 * @author Dotanin Dev <dotanindev@gmail.com>
 * @return Illuminate\Support\Collection
 */
if (!function_exists('getAllMonths')) {
    function getAllMonths(): Collection
    {
        return collect(range(1, 12))->map(function ($month) {
            return (object) [
                'number' => $month,
                'name' => ucfirst(Carbon::create()->month($month)->translatedFormat('F')),
                'short_name' => Carbon::create()->month($month)->translatedFormat('M'),
            ];
        });
    }
}


/**
 * @author Dotanin Dev <dotanindev@gmail.com>
 */
if (!function_exists('getQuarterPeriod')) {
    /**
     * @author Dotanin Dev <dotanindev@gmail.com>
     */
    function getQuarterPeriod()
    {
        $dataAtual = now();
        $trimestre = $dataAtual->quarter;

        $ano = now()->year;

        $mesInicial = ($trimestre - 1) * 3 + 1;

        $mesFinal = $mesInicial + 2;

        $start = Carbon::create($ano, $mesInicial, 1)->startOfMonth();
        $end = Carbon::create($ano, $mesFinal, 1)->endOfMonth();

        return (object) [
            'start' => $start,
            'end' => $end
        ];
    }
}


/**
 * @author Dotanin Dev <dotanindev@gmail.com>
 */
if (!function_exists('getSemiAnnulPeriod')) {
    function getSemiAnnulPeriod()
    {
        $dataAtual = now();

        $ano = now()->year;

        $semestre = $dataAtual->month <= 6 ? 1 : 2;

        if ($semestre === 1) {
            $start = Carbon::create($ano, 1, 1)->startOfDay();
            $end = Carbon::create($ano, 6, 30)->endOfDay();
        } else {
            $start = Carbon::create($ano, 7, 1)->startOfDay();
            $end = Carbon::create($ano, 12, 31)->endOfDay();
        }

        return (object) [
            'start' => $start,
            'end' => $end
        ];
    }
}


/**
 * Format a phone number to the Mozambican format(+258{number})
 * @param string $number
 * @return string
 * @author Nelson Flores <nelson.flores@live.com>
 */
function formatPhone($number)
{
    // all non-digit characters
    $number = preg_replace('/\D/', '', $number);
    // If starts with 258 or 00258
    if (preg_match('/^(258|00258)/', $number)) {
        return '+258' . substr($number, -9); // Keep only the last 9 digits
    }
    // If already starts with +258
    if (str_starts_with($number, '+258')) {
        return $number;
    }

    return '+258' . $number;
}


function format_date($str, $format = 'd-m-Y H:i')
{
    if (empty($str)) {
        return '';
    }
    if (is_numeric($str)) {
        return date($format, $str);
    }
    if (strtotime($str) === false) {
        return $str; // Return the original string if it cannot be parsed
    }
    try {
        return date($format, strtotime($str));
    } catch (\Throwable $th) {
        return $str; // Return the original string if an error occurs
    }
}



/**
 * Generate a random OTP code
 * @param int $size - The size of the OTP code
 * @param string $chars - The characters to use for the OTP code
 * @return string
 * @author Nelson Flores <nelson.flores@live.com>
 */
function generate_otp($size = 6, $chars = '012OPQRSTUV34ABCDZ56EFGHIJKLMN789WXY')
{

    if ($size > strlen($chars)) {
        $size = strlen($chars);
    }

    $arr = str_split($chars);
    shuffle($arr);
    $code = substr(implode("", $arr), 0, $size);

    return $code;
}
/**
 * Convert a file to base64
 * @param string $file - The file to convert
 * @return string
 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
 * @author Nelson Flores <nelson.flores@live.com>
 */
function fileTobase64($file)
{
    $info = pathinfo($file);
    return "data:image/" . $info["extension"] . ";base64, " . base64_encode(file_get_contents($info["dirname"] . "/" . $info["filename"] . "." . $info["extension"]));
}

/**
 * Generate a QR code
 * @param string $content - The content to encode in the QR code
 * @return stdClass - data->url, data->b64, data->filename
 * @author Nelson Flores <nelson.flores@live.com>
 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
 */
function generate_qrcode($content)
{
    $name = uniqid() . '.png';
    $filename = storage_path($name);
    QrCode::size(400)->format('png')->generate($content, $filename);
    $b64qrcode = fileTobase64($filename);


    $data = new stdClass();

    $data->url = url("storage/" . $name);
    $data->b64 = $b64qrcode;
    $data->filename = storage_path($name);
    return $data;
}


/**
 * Split a full name into first and last name
 * @param string $fullname - The full name to split
 * @return array - An array with the first and last name
 * @author Nelson Flores <nelson.flores@live.com>
 */
function splitFullName($fullname)
{
    $explode = explode(' ', $fullname);

    if (count($explode) == 1) {
        return [
            'first' => $fullname,
            'last' => ''
        ];
    }

    $last = $explode[array_key_last($explode)];
    unset($explode[array_key_last($explode)]);
    $first = implode(" ", $explode);


    return [
        'first' => $first,
        'last' => $last,
    ];
}


/**
 * Generate a username from a full name
 * @param string $fullname - The full name to generate the username from
 * @return string - The generated username
 * @author Nelson Flores <nelson.flores@live.com>
 */

function generate_username($fullname)
{
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $fullname);
    $toLower = strtolower($clean);
    $split = explode(' ', trim($toLower));
    $first = $split[0];
    if (count($split) > 1) {
        $last = end($split);
    } else {
        $last = "";
    }
    $username = $first . '.' . $last;

    $counter = '';

    $user = User::where('code', $username)->first();

    while (!empty($user->id)) {
        $counter = empty($counter) ? 1 : ($counter + 1);
        $user = User::where('code', $username . $counter)->first();
    }

    $username = trim($username . $counter, '.');

    return strtolower($username);
}



function payment_status($status)
{
    $status = strtolower($status);
    switch ($status) {
        case 'canceled':
            return __("cancelado");
        case 'completed':
            return __("pago");
        case 'failed':
            return __("falhou");
        case 'pending':
            return __("pendente");
        case 'unclaimed':
            return __("em espera");
        case 'paid':
            return __("pago");
    }
}



function payment_type($type, $alt = '')
{
    $type = empty($type) ? $alt : $type;
    switch (strtolower($type)) {
        case 'topup':
            return __("recarga");
        case 'debt':
            return __("debito");
        case 'credit':
            return __("credito");
        case 'withdraw_to':
            return __("saque");
        default:
            return $type;
    }
}

function currency($code = "mzn"): Currency|null
{
    return Cache::rememberForever('currency_' . $code, function () use ($code) {
        return Currency::where("code", $code)->first();
    });
}

/**
 * Objeto utilitário para geração e recuperação de chaves de redirecionamento de URL via sessão.
 * Métodos:
 *   - make($url): Gera uma chave única, armazena a URL na sessão e retorna a chave.
 *   - get($key): Recupera a URL associada à chave da sessão.
 *   - forget($key): Remove a chave da sessão.
 * Uso:
 *   $key = redirector()->make('url');
 *   $url = redirector()->get($key);
 *   redirector()->forget($key);
 *
 * @return object
 * @author Nelson Flores <nelson.flores@live.com>
 */
function redirector()
{
    return new class {
        private $prefix = 'redirector:';

        public function make($url)
        {
            $key = sha1(generate_otp(7) . time());
            Cache::put($this->prefix . $key, $url, now()->addDay());
            return $key;
        }

        public function get($key)
        {
            return Cache::get($this->prefix . $key);
        }

        public function forget($key)
        {
            Cache::forget($this->prefix . $key);
        }
    };
}

//Geracao do Logotipo em base64
function logoBase64(bool $compress = false): string
{
    if ($compress):
        $logo = file_get_contents(public_path("assets/images/logo-dark-mini.png"));
    else:
        $logo = file_get_contents(public_path("assets/images/logo-dark.png"));
    endif;

    return "data:image/png;base64," . base64_encode($logo);
}

function getMonths(): array
{
    $monthNames = [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
    ];

    $months = [];

    foreach ($monthNames as $index => $monthName) {
        $month = new \stdClass();
        $month->name = $monthName;
        $month->value = $index + 1;
        $months[] = $month;
    }

    return $months;
}

function getYears(): array
{
    $startYear = 2025;
    $currentYear = (int) date('Y');
    if ($currentYear < $startYear):
        return [$startYear];
    endif;

    return range($currentYear, $startYear);
}

function beginTransaction()
{
    DB::beginTransaction();
}

function commitTransaction()
{
    DB::commit();
}

function rollbackTransaction()
{
    DB::rollBack();
}

function transaction(callable $callback)
{
    beginTransaction();
    try {
        $result = $callback();
        commitTransaction();
        return $result;
    } catch (\Exception $e) {
        rollbackTransaction();
        throw $e;
    }
}


function amountInWords(float $amount): string
{
    return str_replace(
        ['real', 'reais'],
        ['metical', 'meticais'],
        (
            (new Extenso())
                ->extenso($amount, Extenso::MOEDA)
        )
    );
}


function formatAmount(float $amount): string
{
    return number_format($amount, 2, '.', ' ');
}


function money(float $amount): string
{
    return number_format($amount, 2, ',', ' ');
}


function monthName(int $month): string
{
    return collect(getMonths())
        ->firstWhere('value', $month)?->name ?? '';
}
function process_status(?string $status = ''): string
{
    $status = strtolower($status);
    switch ($status) {
        case 'under_review':
            return __("Em análise");
        case 'with_opinion':
            return __("Com parecer");
        case 'closed':
            return __("Fechado");
        default:
            return $status;
    }
}

function process_type(?string $type = ''): string
{
    $type = strtolower($type);
    switch ($type) {
        case 'internal':
            return __("Interno");
        case 'external':
            return __("Externo");
        default:
            return $type;
    }
}

function forward_purpose(?string $purpose = ''): string
{
    $purpose = strtolower($purpose);
    switch ($purpose) {
        case 'opinion':
            return __("Parecer");
        case 'information':
            return __("Informação");
        case 'analysis':
            return __("Análise");
        case 'other':
            return __("Outro");
        default:
            return $purpose;
    }
}

function forward_status(?string $status = ''): string
{
    $status = strtolower($status);
    switch ($status) {
        case 'received':
            return __("Recebido");
        case 'in_progress':
            return __("Em andamento");
        case 'completed':
            return __("Concluído");
        case 'canceled':
            return __("Cancelado");
        default:
            return $status;
    }
}


function getIpAddress()
{
    foreach (
        [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ] as $key
    ) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }
    }
    return request()->ip();
}


function regexToHtmlPattern(string $regex): string
{
    // Remove delimitadores e possíveis flags no final
    // Ex.: "/^\d{12}[A-Za-z]$/i" -> "^\d{12}[A-Za-z]$"
    return preg_replace('/^\/(.*)\/[a-zA-Z]*$/', '$1', $regex);
}



function delete_enrollment($id, $component = null)
{
    try {

        beginTransaction();
        $enrollment = \App\Models\Enrollment::find($id);

        if ($enrollment) {
            $scholarship = Scholarship::where('enrollment_id', $enrollment->id)->first();

            if (!empty($scholarship->id)) {
                $scholarship->delete();
                activity_log("Removeu Bolseiro", ['inscricao' => $enrollment->code]);
            }

            if ($enrollment->submitted == true) {
                $class_room = \App\Models\ClassRoom::where('id', $enrollment->class_room_id)->first();
                $class_room->available_vacancies = $class_room->available_vacancies + 1;
                $class_room->save();
            }


            $enrollment->delete();
            activity_log("Removeu inscricao", ['inscricao' => $enrollment->code]);
            session()->flash('success', 'Inscrição excluída com sucesso!');
            if ($component) {
                return $component->js('output.notify("Inscrição excluída com sucesso!")');
            }
        } else {
            session()->flash('error', 'Inscrição não encontrada.');
            if ($component) {
                return $component->js('output.notify("Inscrição não encontrada.")');
            }
        }

        commitTransaction();
    } catch (\Throwable $th) {
        rollbackTransaction();
        session()->flash('error', $th->getMessage());
        if ($component) {
            return $component->js('output.alert("Ocrreu algum erro:' . $th->getMessage() . '")');
        }
    }








}

