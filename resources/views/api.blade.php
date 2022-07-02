<form action="{{ route("/products") }}" method="POST">
    @csrf
    <input type="text" name="input">
    <button type="button">Submit</button>
</form>