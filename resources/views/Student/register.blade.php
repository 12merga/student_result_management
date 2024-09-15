<form action="{{ route('parent.student.register') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Student Name" required>
    <input type="text" name="class" placeholder="Class" required>
    <input type="date" name="dob" placeholder="Date of Birth" required>
    <button type="submit">Register Student</button>
</form>
