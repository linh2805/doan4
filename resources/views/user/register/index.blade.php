

@extends('user.index')
@section('name')
@include('user.home.header')
<form action="{{ route('register.store') }}" method="POST">
    @csrf
    <input type="text" placeholder="Họ và tên" name="full_name" class="form-control mb-3" required>
    <input type="tel" placeholder="Số điện thoại" name="phone" class="form-control mb-3" required>
    <input type="email" placeholder="Email" name="email" class="form-control mb-3" required>
    <input type="text" placeholder="Bạn học trường THPT nào?" name="high_school" class="form-control mb-3" required>
    <input type="text" placeholder="Bạn đang sinh sống ở đâu?" name="residence" class="form-control mb-3" required>
    <select name="major" class="form-control mb-3" required>
        <option value="">— Chọn ngành học —</option>
        <option value="new_student">Học sinh mới</option>
        <option value="transfer_major">Chuyển ngành</option>
    </select>
    <button type="submit" class="btn submit-btn btn-block">GỬI YÊU CẦU</button>
</form>

@include('user.home.footer')