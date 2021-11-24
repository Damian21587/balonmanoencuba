<label for="{{$id}}">@ucfirst($label)
    @if($required)
        <small class="required" style="color: red"> *</small>
    @endif
</label>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone"></i></span>
    </div>
    <input @isset($pattern) pattern="{{$pattern}}" @endisset type="text"
           class="form-control @error($id) is-invalid @enderror {{$class ?? ""}}"
           {{--style="width: 100%; {{$style ?? ""}}"--}}
           name="{{$id}}" id="{{$id}}"
           value="{{ old($id, isset($modelo) ? $modelo->{$id} : '') }} {{--@if(isset($modelo)) {{ old($id,$modelo->{$id} ?? $value) }} @else {{ old($id) }} @endif--}}"
           {{--minlength="{{$minlength ?? 1}}" maxlength="{{$maxlength ?? 255}}"--}}
           placeholder="{{$placeholder ?? ucfirst($label)}}">
    {!! $errors->first($id, '<span class="error invalid-feedback">:message</span>') !!}
</div>
@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#{{$id}}').inputmask('(+53) 9999-99-99')
        })
    </script>
@endpush