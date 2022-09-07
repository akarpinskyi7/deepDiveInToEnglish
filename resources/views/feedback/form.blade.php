<div class="form-group">
    <label for="exampleFormControlInput1">Автор</label>
    <input type="text" name="author" class="form-control" id="exampleFormControlInput1" value="{{$feedback->author ?? ''}}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Опис</label>
    <textarea name="describe" rows="5" class="form-control" id="exampleFormControlInput2" required>{{$feedback->describe ?? ''}}</textarea>
</div>
<input type="file" name="img">
<button type="submit" class="btn btn-primary">Submit</button>
