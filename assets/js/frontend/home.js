function showImage(img_src){
    console.log(img_src)
    $("#mymodal").modal("show", {backdrop: "static"});
    document.getElementById("img01").setAttribute("src" , img_src);
    // document.getElementById("img01").setAttribute("width" , "500px");
}

function doSearch(data,sts)
{
    $.ajax({
      url: siteUrl+'home/cek_card_id',
      method: 'POST',
      dataType: 'json',
      data: {'card_id' : data},
      success: function(e) {
          $('#nama').val(e.nama);
          $('#kelas').val(e.kelas);
          $('#img_siswa').attr('src', e.img);
          if(e.status == true)
          {
              $.ajax({
                  url: siteUrl+'home/input_absen',
                  method: 'POST',
                  dataType: 'json',
                  data: {'card_id' : data,'status' : sts,'id_siswa': e.id_siswa},
                  success: function(e) {
                    if(e.status == true)
                    {
                        $('#card_id').val("");
                     alert('Terima Kasih Anda Sudah Melakukan Absen '+ sts);
                    }
                    else
                    {
                         $('#card_id').val("");
                        alert('Anda Sudah Melakukan Absen '+ sts);
                    }
                  }
                });                 
          }
          else
          {
            $('#card_id').val("");   
            alert('ID Card Anda Belum Terdaftar, Silahkan Hubungi Bagian Admin');
          }
        
      },
     
    });      
}


$(document).ready(function() {
    $("#card_id").bind("paste", function(e){
        sts = $('input[name="absen"]:checked').val();
        var data = e.originalEvent.clipboardData.getData('text');
        newData = data.replace(/(\r\n|\n|\r)/gm," ");
        console.log(newData)
        // doSearch(data,sts);
        
    });
    $("#card_id").on("change", function(e){
        sts = $('input[name="absen"]:checked').val();
        var data = $("#card_id").val();        
        doSearch(data,sts);
    });
});