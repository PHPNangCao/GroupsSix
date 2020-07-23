<form method="POST" action="">
    @csrf
    <table>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>

        <tr>
            <td>Mật Khẩu</td>
            <td><input type="text" name="matkhau"></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit"> Đăng Nhập </button>
            </td>
        </tr>
    </table>
</form>
