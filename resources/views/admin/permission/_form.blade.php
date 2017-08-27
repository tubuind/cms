<fieldset class="content-group">
    <legend class="text-bold">Input info</legend>

    <!-- Basic text input -->
    <div class="form-group">
        <label class="control-label col-lg-3">Name <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Input name']) }}
            @if ($errors->has('name'))
                <span class="label-error">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
    </div>
    <!-- /basic text input -->

    <!-- Basic text input -->
    <div class="form-group">
        <label class="control-label col-lg-3">Action <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {{ Form::text('action', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Input Action']) }}
            @if ($errors->has('action'))
                <span class="label-error">
                    {{ $errors->first('action') }}
                </span>
            @endif
        </div>
    </div>
    <!-- /basic text input -->

    <!-- Basic text input -->
    <div class="form-group">
        <label class="control-label col-lg-3">Note </label>
        <div class="col-lg-9">
            {{ Form::text('note', null, ['class' => 'form-control', 'placeholder' => 'Input Note']) }}
            @if ($errors->has('note'))
                <span class="label-error">
                    {{ $errors->first('note') }}
                </span>
            @endif
        </div>
    </div>
    <!-- /basic text input -->

    <!-- Basic text input -->
    <div class="form-group">
        <label class="control-label col-lg-3"></label>
        <div class="col-lg-9">
            @if ($errors->has('unknown_error'))
                <span class="label-error">
                    {{ $errors->first('unknown_error') }}
                </span>
            @endif
        </div>
    </div>
    <!-- /basic text input -->

</fieldset>

<div class="text-right">
    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
</div>

