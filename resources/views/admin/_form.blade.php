<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $movie->title ?? '') }}">
</div>
<div class="form-group">
    <label for="poster">Poster URL</label>
    <input type="text" name="poster" class="form-control" id="poster" value="{{ old('poster', $movie->poster ?? '') }}">
</div>
<div class="form-group">
    <label for="intro">Intro</label>
    <textarea name="intro" class="form-control" style="width: 100%;" id="intro" rows="4">{{ old('intro', $movie->intro ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="release_date">Release Date</label>
    <input type="date" name="release_date" class="form-control" id="release_date" value="{{ old('release_date', $movie->release_date ?? '') }}">
</div>
<div class="form-group">
    <label for="genes_id">Genre</label>
    <select name="genes_id" class="form-control" id="genes_id">
        @foreach($genes as $gene)
        <option value="{{ $gene->id }}" {{ (old('genes_id') ?? $movie->genes_id ?? '') == $gene->id ? 'selected' : '' }}>
            {{ $gene->name }}
        </option>
        @endforeach
    </select>
</div>