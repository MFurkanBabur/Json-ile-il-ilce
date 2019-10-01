<html>
<head>
    <title>json ile [ il ve ilçe ]</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Json ile il ve ilçe çekimi</h1>
                <p>Mevcut il ilçe listesi 2018 yılına ait bir listedir. Dilerseniz yeni listeyi internet üzerinden indirebilirsiniz. [ Not: ulaştırma bakanlığı 2019 yılına ait güncel listeyi dosya içerisinde excel olarak sizler ile paylaşıyor olacağım, her hangi bir değişiklik söz konusu ise buradan bakabilirsiniz. ]</p>
            </div>

            <div class="col-md-3">
                <select name="il" id="bil" class="form-control">
                    <option value="">Seçin...</option>
                </select>
            </div>

            <div class="col-md-3">
                <select name="ilce" id="bilce" class="form-control" disabled="disabled">
                    <option value="">Seçin...</option>
                </select>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $.getJSON("il-bolge.json", function(sonuc){
            $.each(sonuc, function(index, value){
                var row="";
                row +='<option value="'+value.il+'">'+value.il+'</option>';
                $("#bil").append(row);
            })
        });

        $("#bil").on("change", function(){
            var il=$(this).val();

            $("#bilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
            $.getJSON("il-ilce.json", function(sonuc){
                $.each(sonuc, function(index, value){
                    var row="";
                    if(value.il==il)
                    {
                        row +='<option value="'+value.ilce+'">'+value.ilce+'</option>';
                        $("#bilce").append(row);
                    }
                });
            });
        });
    </script>
</body>
</html>