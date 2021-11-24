<label for="{{$id}}">@ucfirst($label)
    @if($required) <small class="required" style="color: red"> * </small>
    @endif
</label>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    </div>
<input type="date" class="form-control @error($id) is-invalid @enderror {{$class ?? ""}}"
       {{--style="width: 100%; {{$style ?? ""}}"--}} name="{{$id}}" id="{{$id}}"
       data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask
       value={{ old($id, isset($modelo) ? $modelo->{$id} : '') }}
       @isset($min) min="{{ $min }}" @endisset @isset($max) max="{{ $max }}" @endisset>
{!! $errors->first($id, '<span class="error invalid-feedback">:message</span>') !!}
</div>
