
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    span{
      color: red;
    }
  </style>
</head>
<body>
  <?php 
      // session_start();
      if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
          unset($_SESSION['error']);
      }
      
  ?>
  <form action="process_signup.php" method="post">
                    <h1>Form đăng ký</h1>
                    Tên
                    <input type="text" name="name" id="name">
                    <span id="error_name"></span>
                    <br>
                    Email
                    <input type="email" name="email" id="email">
                    <span id="error_mail"></span>
                    <br>
                    Mật khẩu
                    <input type="password" name="password" id="password">
                    <span id="error_password"></span>
                    <br>
                    SDT
                    <input type="text" name="phone_number" id="phone_number">
                    <span id="error_phone"></span>
                    <br>
                    Địa chỉ
                    <input type="text" name="address" id="address">
                    <span id="error_address"></span>
                    <br>
                    <button onclick="return check()">Đăng ký</button>
  </form>
  <script>
    function check() {
      let isTrue = true;

      let name = document.getElementById("name").value;
      let mail = document.getElementById("email").value;
      let password = document.getElementById("password").value;
      let phone = document.getElementById("phone_number").value;
      let address = document.getElementById("address").value;
      
      if(name.length === 0){
        isTrue = false;
        document.getElementById("error_name").innerHTML = "Không được để trống tên";
      }
      else{
        let regex_name =
            /^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(?: [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)*/;
        if (!regex_name.test(name)) {
            isTrue = false; 
            document.getElementById("error_name").innerHTML = "Tên không hợp lệ"
        } else {
            document.getElementById("error_name").innerHTML = "";
        }
      }

      if (mail.length === 0) {
        isTrue = false;
        document.getElementById("error_mail").innerHTML = "Không được để trống mail";
      } else {
        let regex_mail = /^[a-z0-9_]+@[a-z]+\.[a-z]+$/;
        if (!regex_mail.test(mail)) {
            isTrue = false;
            document.getElementById("error_mail").innerHTML = "email không hợp lệ"
        } else {
            document.getElementById("error_mail").innerHTML = "";
        }
     }

     if (password.length === 0) {
        isTrue = false;
        document.getElementById("error_password").innerHTML = "Không được để trống password";
     } else {
      document.getElementById("error_password").innerHTML = "";
     }

     if(phone.length === 0){
        isTrue = false;
        document.getElementById("error_phone").innerHTML = "Không được để trống số điện thoại";
     }
     else{
        let regex_phone = /((^(\+84|84|0|0084){1})(3|5|7|8|9))+([0-9]{8})$/;
          if(!regex_phone.test(phone)){
            isTrue = false
            document.getElementById("error_phone").innerHTML = "Số điên thoại không hợp lệ";
          }
          else{
        document.getElementById("error_phone").innerHTML = "";
          }
     }

     if(address.length === 0){
      isTrue = false;
      document.getElementById("error_address").innerHTML = "Không được để trống địa chỉ";
     }
     else{
      document.getElementById("error_address").innerHTML = "";
     }

      return isTrue;
    }
  </script>
</body>
</html>
  
    

