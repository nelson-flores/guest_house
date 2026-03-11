<div>
    {{-- Because she competes with no one, no one can compete with her. --}}



          <!-- Advanced Gallery -->
          <h2 class="content-heading">Advanced</h2>
          <div class="row g-sm items-push js-gallery push">
            @foreach ($this->photos as $photo)
                



            <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
              <div class="options-container fx-item-rotate-r">
                <img class="img-fluid options-item" src="{{  url($photo->thumbnail_path) }}" alt="">
                <div class="options-overlay bg-black-75">
                  <div class="options-overlay-content">
                    <h3 class="h4 fw-normal text-white mb-1">{{ $photo->title }}</h3>
                    <h4 class="h6 fw-normal text-white-75 mb-3">{{ $photo->description }}</h4>
                    <a class="btn btn-sm btn-primary img-lightbox" href="{{ url($photo->file_path) }}">
                      <i class="fa fa-search-plus me-1"></i> Ver
                    </a>
                    <a class="btn btn-sm btn-secondary" href="javascript:void(0)">
                      <i class="fa fa-pencil-alt me-1"></i> Editar
                    </a>
                  </div>
                </div>
              </div>
            </div>
            





            @endforeach
          </div>
          <!-- END Advanced Gallery -->


    @script
<script>One.helpersOnLoad(['jq-magnific-popup']);</script>
    @endscript
</div>
