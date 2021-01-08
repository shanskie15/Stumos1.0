<div class="card" style="margin:2%;">
  <div class="card-header">
    Section
  </div>
  <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('section.store') }}" autocomplete="off" class="form-horizontal">
                @csrf
                @method('post')
                <div class="row">
                    <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Section Name') }}</label>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <input class="form-control" name="section_name" type="text" placeholder="{{ __('Section Name') }}" required />
                    </div>
                    </div>
                    <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Room Number') }}</label>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <input class="form-control" name="room_number" type="text" placeholder="{{ __('Room Number') }}" required />
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                    <button type="submit" class="btn btn-primary">{{ __('Add Section') }}</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>