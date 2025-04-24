<script>
            $(document).ready(function()
            {
                $('#display #t1').hide();
                
                $('#btnsearch').click(function(){  
                    search_table($("#txtname").val());
                });
                $('#txtCname').keyup(function(){
                    search_table($(this).val());
                });
                function search_table(value){
                    $('#display #t1').each(function(){
                        var found='false';
                        $(this).each(function()
                        {
                            if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
                            {
                                found='true';
                            }
                        });
                        if(found=='true')
                        {
                            $(this).show();
                        }
                        else
                        {
                            $(this).hide();
                        }
                    }); 
                }
            });  
 </script>
