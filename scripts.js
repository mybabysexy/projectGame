searchBarState = 0;
		function showSearchBar()
		{
			if(searchBarState == 1)
			{
				document.getElementById('searchBar').style.display="none";
				document.getElementById('searchButton').style.border="3px solid white";
				document.getElementById('searchButton').style.color="white";
				document.getElementById('searchButton').value="Tìm kiếm";
				searchBarState = 0;
			}
			else {
				document.getElementById('searchBar').style.display="flex";
				document.getElementById('searchButton').style.border="3px solid red";
				document.getElementById('searchButton').style.color="red";
				document.getElementById('searchButton').value="Đóng lại";
				searchBarState+=1;
			}
		}
		function signup()
		{
			var check = 0;
			var regUser=/^[a-zA-Z0-9_]+$/;
			var regMatKhau=/^[a-zA-Z0-9]+$/;
			var regEmail=/^[a-zA-Z]*[a-zA-Z0-9_.]+@[A-Za-z0-9]+\.?[a-zA-Z]+\.[A-Za-z]{2,3}$/;	
			var regSoDienThoai=/^[0-9+]+$/;

			if(document.getElementById("username").value.length == 0)
			{
				document.getElementById("errUsername").innerHTML = "Hãy điền tên đăng nhập";
				document.getElementById("username").style.border = "2px solid red";
			}
			else if(document.getElementById("username").value.length >=8 && document.getElementById("username").value.length <= 16)
			{
				var kqUser = regUser.test(document.getElementById("username").value);
				if(kqUser)
				{
					document.getElementById("errUsername").innerHTML = "";
					document.getElementById("username").style.border = "1px solid #ccc";
					check++;	
				}
				else
				{
					document.getElementById("errUsername").innerHTML="Không đúng định dạng";
				}
			}
			else
			{
				document.getElementById("errUsername").innerHTML="username phải từ 8 đến 16 kí tự";		
			}

			if(document.getElementById("password").value.length == 0)
			{
				document.getElementById("errPassword").innerHTML = "Hãy điền mật khấu";
				document.getElementById("password").style.border = "2px solid red";
			}
			else if(document.getElementById("password").value.length >= 8)
			{
				var kqMatKhau=regMatKhau.test(document.getElementById("password").value);
				if(kqMatKhau)
				{
					document.getElementById("errPassword").innerHTML="";
					document.getElementById("password").style.border = "1px solid #ccc";
					check++;		
				}
				else
				{
					document.getElementById("errPassword").innerHTML="Không đúng định dạng";		
				}
			}
			else document.getElementById("errPassword").innerHTML="Mật khẩu phải lớn hơn 8 kí tự";

			if(document.getElementById("repassword").value.length == 0)
			{
				document.getElementById("errRepassword").innerHTML = "Hãy nhập lại mật khấu";
				document.getElementById("repassword").style.border = "2px solid red";
			}
			else if(document.getElementById("repassword").value != document.getElementById("password").value)
			{
				document.getElementById("errRepassword").innerHTML = "Mật khấu không khớp";
			}
			else
			{
				document.getElementById("errRepassword").innerHTML = "";
				document.getElementById("repassword").style.border = "1px solid #ccc";
				check++;
			}

			if(document.getElementById("nameKH").value.length == 0)
			{
				document.getElementById("errnameKH").innerHTML = "Hãy điền tên của bạn";
				document.getElementById("nameKH").style.border = "2px solid red";
			}
			else{
				document.getElementById("errnameKH").innerHTML = "";
				document.getElementById("nameKH").style.border = "1px solid #ccc";
			}

			if(document.getElementById("email").value.length == 0)
			{
				document.getElementById("errEmail").innerHTML = "Hãy điền email";
				document.getElementById("email").style.border = "2px solid red";
			}
			else
			{
				var kqEmail=regEmail.test(document.getElementById("email").value);
				if(kqEmail)
				{
					document.getElementById("errEmail").innerHTML = "";
					document.getElementById("email").style.border = "1px solid #ccc";
					check++;		
				}
				else
				{
					document.getElementById("errEmail").innerHTML ="Không đúng định dạng";	
				}
			}

			if(document.getElementById("sdt").value.length == 0)
			{
				document.getElementById("errSDT").innerHTML = "Hãy điền số điện thoại";
				document.getElementById("sdt").style.border = "2px solid red";
			}
			else
			{
				var kqDienThoai=regSoDienThoai.test(document.getElementById("sdt").value);
				if(kqDienThoai)
				{
					document.getElementById("errSDT").innerHTML = "";
					document.getElementById("sdt").style.border = "1px solid #ccc";
					check++;	
				}else
				{
					document.getElementById("errSDT").innerHTML.innerHTML="Không đúng định dạng";	
				}
			}
			
			if(check == 5) document.getElementById("loginButton").type= 'submit';
		}
		function login()
		{
			if(document.getElementById("name").value.length != 0 && document.getElementById("pass").value.length != 0)
				document.getElementById("loginButton").type= 'submit';
			else if(document.getElementById("name").value.length == 0 && document.getElementById("pass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập và mật khấu"
			else if(document.getElementById("pass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền mật khấu"
			else document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập";
		}
		function changePass()
		{
			var check = 0;
			var regMatKhau=/^[a-zA-Z0-9]+$/;

			if(document.getElementById("password").value.length == 0)
			{
				document.getElementById("errPassword").innerHTML = "Hãy điền mật khấu";
			}
			else if(document.getElementById("password").value.length >= 8)
			{
				var kqMatKhau=regMatKhau.test(document.getElementById("password").value);
				if(kqMatKhau)
				{
					document.getElementById("errPassword").innerHTML="";
					check++;		
				}
				else
				{
					document.getElementById("errPassword").innerHTML="Không đúng định dạng";		
				}
			}
			else document.getElementById("errPassword").innerHTML="Mật khẩu phải lớn hơn 8 kí tự";

			if(document.getElementById("repassword").value.length == 0)
			{
				document.getElementById("errRepassword").innerHTML = "Hãy nhập lại mật khấu";
			}
			else if(document.getElementById("repassword").value != document.getElementById("password").value)
			{
				document.getElementById("errRepassword").innerHTML = "Mật khấu không khớp";
			}
			else
			{
				document.getElementById("errRepassword").innerHTML = "";
				check++;
			}
			if(check == 2) document.getElementById("loginButton").type= 'submit';
		}