<form >
    <div class="form-group">
        <label for="step{{$step->id}}">
        {{$step->name}}
        </label>
        <input type="checkbox" name="step" value="{{$step->id}}" id="step{{$step->id}}" @checked($step->completed) wire:change='complete({{$step->id}})' wire:key={{$step->id}}>
    </div>
    </form>
