// kiểm tra đăng kí
// var buttonCheck = document.querySelector('.btn-check');
// buttonCheck.onclick  = function checkDangKi(){
    
// }

var form = document.getElementById('regForm');

form.addEventListener('submit', (event) =>{
    var inputElement = document.querySelectorAll('input');
    var input1 = inputElement[0];
    var input2 = inputElement[1];
    var input3 = inputElement[2];
    var input4 = inputElement[3];

    if(input1.value==''||input2.value==''||input3.value==''||input4.value==''){
        alert('Bạn phải nhập đầy đủ thông tin');
        event.preventDefault();
    }else if(input1.value.length<8||input2.value.length<8||input3.value.length<8){
        alert('Tài khoản hoặc mật khẩu phải từ 8 kí tự trở lên');
        event.preventDefault();
    }else{
        if(input2.value !== input3.value){
            alert('Mật khẩu nhập lại không khớp');
            event.preventDefault();
        }
    }
});