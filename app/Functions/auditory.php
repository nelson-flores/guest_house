<?php
use App\Models\ActivityLog;

if (!function_exists('activity_log')) {
    function activity_log($action, $details = null)
    {
        $user = user();

        ActivityLog::create([
            'user_id' => $user ? $user->id : null,
            'branch_id'=>$user->current_branch()->id,
            'action' => $action,
            'details' => is_array($details) ? json_encode($details) : $details,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
