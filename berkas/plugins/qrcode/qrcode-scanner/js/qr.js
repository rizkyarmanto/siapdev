function read(a)
{
    $("#qr-value").text(a);
    swal("Sukses !", a, "success");
    
}
    
qrcode.callback = read;