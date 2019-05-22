
$('form input[type=text], input[type=file], input[type=number], input[type=password], input[type=email], select[name=level]').on('change invalid input', function() {
	var textfield = $(this).get(0);
    var username = document.querySelector('input[name="username"]');
    var password = document.querySelector('input[name="password"]');
    var password2 = document.querySelector('input[name="password2"]');
    var email = document.querySelector('input[name="email"]');
    var tahun = document.querySelector('input[name="tahun"]');


    // hapus dulu pesan yang sudah ada
    textfield.setCustomValidity('');

    // PENGKONDISISAN VALIDASI
    if (this.value.trim() === '') {
    	textfield.setCustomValidity('Wajib di Isi!');  
    }else if (!username.validity.valid) {
        username.setCustomValidity('Username Minimal 3 Karakter!');  
    }else if (!password.validity.valid) {
        password.setCustomValidity('Username Minimal 6 Karakter!');
    }else if (password2.value.trim() != password.value.trim()) {
        password2.setCustomValidity('Konfirmasi Password Tidak Sesuai!');
    }else if (!email.validity.valid) {
        email.setCustomValidity('Email Anda Tidak Valid!');
    }else if (!tahun.validity.valid) 
    {
        tahun.setCustomValidity('Input Tahun dengan Format Maksimal 4 Angka!');
    }
    else{
        textfield.setCustomValidity('');
    }
});



// $(document).ready(function(){
//     $('#username').blur(function(){
//         var username = $(this).val();
//         $.ajax({
//             url: "../../pages/functions/select.php",
//             method:"$_POST",
//             data:{username:username},
//             daaType:"text"
//             success: function(response){
//                 if (response = 'success') 

//                 username.setCustomValidity('yes');
//             }
//         });
//     });
// });


// // PERINGATAN VALIDASI FORM
// // email validate
// var email = document.querySelector('input[name="email"]');
// // email.setCustomValidity('Email Wajib di Isi!!!');

// // email.addEventListener('input', function () {
// //   // Note: if (this.checkValidity()) won't work
// //   // as setCustomValidity('with a message') will set
// //   // the field as invalid.
// //   if (this.value.trim() === '') {
// //   	this.setCustomValidity('Email Wajib di Isi!!!');
// //   }
// //   else {
// //   	this.setCustomValidity('');
// //   }
// // }, false);

// email.addEventListener('input', function () {
//     email.setCustomValidity('');
// 	if (email.validity.typeMismatch) {
// 		email.setCustomValidity("Email Anda Tidak Valid!!!");
// 	}
// }, false);

//     // nama validate
// //     var nama = document.querySelector('input[name="nama"]');
// //     nama.setCustomValidity('Nama Wajib di Isi!!!');

// //     nama.addEventListener('input', function () {
// //   // Note: if (this.checkValidity()) won't work
// //   // as setCustomValidity('with a message') will set
// //   // the field as invalid.
// //   if (this.value.trim() === '') {
// //   	this.setCustomValidity('Nama Wajib di Isi!!!');
// //   }
// //   else {
// //   	this.setCustomValidity('');
// //   }
// // }, false);

//     nama.addEventListener('input', function () {
//     	if (nama.validity.patternMismatch) {
//     		nama.setCustomValidity("Nama Minimal 3 Karkter!!!")
//     	}

//     }, false);


    // validate username
    // var username = document.querySelector('input[name="username"]');
    // // username.setCustomValidity('Username Wajib di Isi!!!');

    // // username.addEventListener('input', function () {

    // // 	if (this.value.trim() === '') {
    // // 		this.setCustomValidity('Username Wajib di Isi!!!');
    // // 	}
    // // 	else {
    // // 		this.setCustomValidity('');
    // // 	}
    // // }, false);
    
    // username.addEventListener('input', function () {
    // 	if (username.validity.patternMismatch) {
    // 		username.setCustomValidity("Username Minimal 3 Karkter!!!");
    // 	}else{
    //         this.setCustomValidity('');
    //     }

    // }, false);



//      // validate password
//     var password = document.querySelector('input[name="password"]');
//     var password2 = document.querySelector('input[name="password2"]');
//     // password.setCustomValidity('Password Wajib di Isi!!!');
//     // password2.setCustomValidity('Konfirmasi Password Wajib di Isi!!!');
//     // // password2 jika kosong
//     // password2.addEventListener('input', function(){
//     // 	if (this.value.trim() === '') {
//     // 		this.setCustomValidity('Konfirmasi Password Wajib di Isi!!!');
//     // 	}else{
//     // 		this.setCustomValidity('');
//     // 	}
//     // }, false);
// /////////////////////////////
// 	password2.addEventListener('input', function(){
// 		if (password2.value !== password.value) {
// 			password2.setCustomValidity("Konfirmasi Password Tidak Sesuai!!!");
// 		}else{
//             this.setCustomValidity('');
//         }

// 	}, false);

// /// VALIDATE PASSWORD
//     // password.addEventListener('input', function () {

//     // 	if (this.value.trim() === '') {
//     // 		this.setCustomValidity('Password Wajib di Isi!!!');
//     // 	}
//     // 	else {
//     // 		this.setCustomValidity('');
//     // 	}
//     // }, false);

//     password.addEventListener('input', function () {
//         password.setCustomValidity('');
//     	if (password.validity.patternMismatch) {
//     		password.setCustomValidity("Password Minimal 6 Karkter!!!");
//     	}

//     }, false);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

// //jqery capitalize judul
jQuery(document).ready(function() {

    jQuery('#judul').on("keyup",function() 
    {
        var str = jQuery('#judul').val();

        
        var spart = str.split(" ");
        for ( var i = 0; i < spart.length; i++ )
        {
            var j = spart[i].charAt(0).toUpperCase();
            spart[i] = j + spart[i].substr(1);
        }
        jQuery('#judul').val(spart.join(" "));

    });
});

// //jqery capitalize nama
jQuery(document).ready(function() {

	jQuery('#nama').on("keyup",function() 
	{
		var str = jQuery('#nama').val();

		
		var spart = str.split(" ");
		for ( var i = 0; i < spart.length; i++ )
		{
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#nama').val(spart.join(" "));

	});
});

// //jqery capitalize instansi
jQuery(document).ready(function() {

	jQuery('#instansi').on("keyup",function() 
	{
		var str = jQuery('#instansi').val();

		
		var spart = str.split(" ");
		for ( var i = 0; i < spart.length; i++ )
		{
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#instansi').val(spart.join(" "));

	});
});

// //jqery capitalize pekerjaan
jQuery(document).ready(function() {

	jQuery('#pekerjaan').on("keyup",function() 
	{
		var str = jQuery('#pekerjaan').val();

		
		var spart = str.split(" ");
		for ( var i = 0; i < spart.length; i++ )
		{
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#pekerjaan').val(spart.join(" "));

	});
});

// //jqery capitalize pekerjaan
jQuery(document).ready(function() {

	jQuery('#alamat').on("keyup",function() 
	{
		var str = jQuery('#alamat').val();

		
		var spart = str.split(" ");
		for ( var i = 0; i < spart.length; i++ )
		{
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#alamat').val(spart.join(" "));

	});
});
// //jqery capitalize nama kategori
jQuery(document).ready(function() {

	jQuery('#namkat').on("keyup",function() 
	{
		var str = jQuery('#namkat').val();

		
		var spart = str.split(" ");
		for ( var i = 0; i < spart.length; i++ )
		{
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#namkat').val(spart.join(" "));

	});
});
// // show hide aksi edit dan print
// function edit() {
// 	document.getElementById("edit").style.display = "block";
// 	document.getElementById("cetak_kartu").style.display = "none";
// }

// function cetak_kartu() {
// 	document.getElementById("cetak_kartu").style.display = "block"; 
// 	document.getElementById("edit").style.display = "none";

// }
// datatabel option
// tabelanggota
$(document).ready(function() {
	$('#tabelanggota').dataTable( {
		"ordering": false,
		"info" : true,
		"language": {
			"url" : "assets/js/Indonesian.json",
			"sEmptyTable" : "Tidads"
		}
	} );
} );
    // end tabel anggota

    // tabel kategori
    $(document).ready(function() {
    	$('#tabelkategori').dataTable( {
    		"ordering": false,
    		"paging" : false,
    		"language": {
    			"url" : "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
    			"sEmptyTable" : "Tidads"
    		}
    	} );
    } );

    // tabel transaki
    $(document).ready(function() {
        $('#tabeltransaksi').dataTable( {
            "ordering": false,
            "paging" : false,
            "info":     false,
            // "scrollX": 200,
            "language": {
                "url" : "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "sEmptyTable" : "Tidads"
            }
        } );
    } );

// tabel user
$(document).ready(function() {
	$('#tabeluser').DataTable( {
		"scrollY":        "40vh",
		"sScrollX": "100%",
		"scrollXInner": "100%",
		"scrollCollapse": true,
		"ordering" : false,
		"paging":         false,
		"language": {
			"url" : "assets/js/Indonesian.json",
			"sEmptyTable" : "Tidads"

		}

	} );
} );
    // hover panel collapse Tambah data kategori
    $(".panel-heading").parent('.panel').hover(

    	function() {
    		$(this).children('.collapse').collapse('show');
    	}, function() {
    		if ($("#kode").val()!='') 
    		{
    			$(this).children('.collapse').collapse('show');
    		} else {
    			$(this).children('.collapse').collapse('hide');
    		}
    		
    	}
    	);

    // password validation popover
    // $("#password2").keyup(function(){
    // 	if ($("#password2").val() != $("#password").val()) {
    // 		$("#password2").css("border-color", "red");
    // 		$('[data-toggle="popover"]').popover('show');
    // 		$(".popover-content").css("color", "white");
    // 		$("#good").css("display", "none");

    // 	}else{
    // 		$('[data-toggle="popover"]').popover('destroy');
    // 		$("#good").css("display", "inline");


    // 	}

    // });
    // $("#fom").submit(function(){
    // 	if ($("#password2").val() != $("#password").val()) {
    // 		return false;
    // 	}else{
    // 		return true;
    // 	}

    // });
    

    // number only
    function numberOnly(id) {
    // Get element by id which passed as parameter within HTML element event
    var element = document.getElementById(id);
    // User numbers only pattern, from 0 to 9
    var regex = /[^0-9]/gi;
    // This removes any other character but numbers as entered by user
    element.value = element.value.replace(regex, "");
}

// fungsi cek transaksi
$('#cektransaksi').change(function() {
    if (this.checked) {
        $('#noanggota').prop("readonly", true);
        $('#kodekoleks').focus();
        $('#kodekoleks').prop("disabled", false);

    }else{
        $('#noanggota').prop("readonly", false);
        $('#noanggota').focus();
        $('#kodekoleks').prop("disabled", true);
    }
});

// funsi kode valid
$('input[type="checkbox"][name="cekkode"]').change(function() {
 if(this.checked) {
   $('#kode').prop("readonly", false); 
   $("#kode").css("cursor","auto");
   $('#kode').prop("min", "0");
   $('.keym').prop("id", "#");
   $('#kode').val('');
   $('#kode').focus();
   $('#labkode').css("cursor", "auto");
   $('#kode').prop("maxlength","11")
     // fungsi number only
     $("#kode").keypress(function(e) {
      //if the letter is not digit then display error and don't type anything
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

        return false;
    }
});
     // fungsi spli kode 111.111.111
     $('#kode').keyup(function(event) {


      // When user select text in the document, also abort.
      var selection = window.getSelection().toString();
      if (selection !== '') {
        return;
    }

      // When the arrow keys are pressed, abort.
      if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
        return;
    }

    var $this = $(this);
    var input = $this.val();
    input = input.replace(/[\W\s\._\-]+/g, '');

    var split = 3;
    var chunk = [];

    for (var i = 0, len = input.length; i < len; i += split) {
        split = (i >= 3 && i < 9) ? 100 : 3;
        chunk.push(input.substr(i, split));
    }

    $this.val(function() {
        return chunk.join(".").toUpperCase();
    });

})(jQuery);
}else{
    $('#kode').prop("readonly", true);
    $("#kode").css("cursor","pointer");
    $('#kode').prop("type", "text");
    $('#kode').prop("min", "");
    $('#labkode').css("cursor", "pointer");
    $('#kode').prop("data-target", "#kodeModal");
    $('.keym').prop("id", "kodeModal");
    $('#kode').focus();
    $('#kode').val('');
}
});

// text only modals koleksi

$('#buatkode').keypress(function (e) {
    // var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else
    {
        e.preventDefault();

        return false;
    }
});

// javascript focus
focusMethod = function getFocus() {          
  document.getElementById("kode").focus();
}


// ajax