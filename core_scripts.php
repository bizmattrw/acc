<script src="assets/argon/assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/argon/assets/vendor/popper/popper.min.js"></script>
<script src="assets/argon/assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="assets/argon/assets/vendor/headroom/headroom.min.js"></script>
<script src="assets/argon/assets/js/argon.js?v=1.0.1"></script>
<script>
    function doShowAlert() {
        $("#next-page").attr("value", "allmembers.php");
        showAlert(function () { location.assign('allmembers.php?t=' + $("#type-select").val() + '&q=' + $('#location-select').val() + '') });
    }
    function doShowAlert1() {
        $("#next-page").attr("value", "all_imirima.php");
        showAlert(function () { location.assign('all_imirima.php?t=' + $("#type-select").val() + '&f=' + $('#location-select').val() + '') });
    }
    function doShowAlert2() {
        $("#next-page").attr("value", "all_ifumbire.php");
        showAlert(function () { location.assign('all_ifumbire.php?t=' + $("#type-select").val() + '&f=' + $('#location-select').val() + '') });
    }
    function doShowAlert3() {
        $("#next-page").attr("value", "all_imbuto.php");
        showAlert(function () { location.assign('all_imbuto.php?t=' + $("#type-select").val() + '&f=' + $('#location-select').val() + '') });
    }
    function doShowAlert4() {
        $("#next-page").attr("value", "all_amadeni.php");
        showAlert(function () { location.assign('all_amadeni.php?t=' + $("#type-select").val() + '&f=' + $('#location-select').val() + '') });
    }
    function doShowAlert5() {
        $("#next-page").attr("value", "createumusaruro.php");
        showAlert(function () { location.assign('./createumusaruro.php?t=' + $("#type-select").val() + '&f=' + $('#location-select').val() + '') });
    }
    function doShowAlert6() {
        $("#next-page").attr("value", "member_files.php");
        showAlert(function () { location.assign('./member_files.php?t=' + $("#type-select").val() + '&q=' + $('#location-select').val() + '') });
    }
    function doShowAlert7() {
        $("#next-page").attr("value", "card_front.php");
        showAlert(function () { location.assign('./card_front.php?t=' + $("#type-select").val() + '&q=' + $('#location-select').val() + '') });
    }
    function doShowAlert8() {
        $("#next-page").attr("value", "card_back.php");
        showAlert(function () { location.assign('./card_back.php?t=b&q=' + $('#location-select').val() + '') });
    }
    function doShowAlert9() {
        $("#next-page").attr("value", "all_imirima.php?q=umurima");
        showAlert(function () { location.assign('./all_imirima.php?t=' + $('#type-select').val() + '&q=umurima&f=' + $('#location-select').val() + '') });
    }
    function doShowAlert10() {
        $("#next-page").attr("value", "all_ifumbire.php?q=fertilizer");
        showAlert(function () { location.assign('./all_ifumbire.php?q=fertilizer&t=' + $('#type-select').val() + '&f=' + $('#location-select').val() + '') });
    }
    function showAlert(callback) {
        $("#location-alert").modal();
        document.getElementById('location-select').onchange = function() {
            callback();
        };
    }

    function fillNext(str) {
        console.log(str);
		if (str == "") {
			//document.getElementById(type).innerHTML = "<option></option>";
			return;
		} else {
            var xmlhttp;

			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    $("#location-select").html(this.responseText);
				}
            };
            if (str == "z") {
                xmlhttp.open("GET","ajaxget.php?type=zones", true);
			    xmlhttp.send();
            } else if (str == "h") {
                xmlhttp.open("GET","ajaxget.php?type=blocs", true);
			    xmlhttp.send();
            } else if (str == "all") {
                let nextPage = $("#next-page").val();
                
                if (nextPage.indexOf("?") == - 1) {
                    location.assign(nextPage + "?t=" + str);
                } else {
                    location.assign(nextPage + "&t=" + str);
                }
            }
		}
	}
</script>