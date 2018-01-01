

<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
       var readMoreHtml = $(".read-more").html();
        var lessText = readMoreHtml.substr(0,100);
        
        
        if(readMoreHtml.length > 100){
            $(".read-more").html(lessText).append("<a href='' class='read-more-link'> Show More</a>");
        }else{
            $(".read-more").html(readMoreHtml);
        }
        
        $("body").on("click", ".read-more-link", function(event){
            event.preventDefault();
            $(this).parent(".read-more").html(readMoreHtml).append("<a href='' class='read-less-link'> Show Less</a>")
        });
        
        $("body").on("click", ".read-more-link", function(event){
            event.preventDefault();
            $(this).parent(".read-more").html(readMoreHtml.substr(0, 100)).append("<a href='' class='read-less-link'> Show More</a>")
        });
    });


</script>
<style>
    body{
        background: gray;
        padding: 0;
        margin: 0;
        font-family: sans-serif;
    }
    
    .content{
        background: #fff;
        margin: 0 auto;
        width: 600px;
        padding: 10px;
        min-height: 300px;
    }
    .read-more{
        border: 1px solid #000;
        padding: 15px;
        margin-bottom: 20px;
    }
    .read-more-link, .show-less-link{
        text-decoration: none;
        font-weight: bolder;
        color: green;
    }

</style>

<body>
<div class="content">
        
            <div class="read-more">
                    
                EBE has been updated. Version 219, and with it a lot of cool new features, blocks, smileys, and of course commands!
                But that's not all. We also earned a bigger community! New players have been joiwa 8y382929j8ru9f8dsfsdhf9sdjfsd9fusdned to our little game as well, And EBE is starting to grow! So lets list all the new stuff we haveasdoi u3298um34 928u3423 added here!
                The first tasdmowahihiu aud iny98asdasdasdsau aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasdu aud iny98asdasdasd
                
            </div>
                
            </div>
    </body>