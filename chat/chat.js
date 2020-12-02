
renderMessages();

$("button").click(function(e){
    e.preventDefault();
    let message = $("input").val();
    $.ajax({
        url:"routeur.php?function=postMessage",
        method:"POST",
        dataType:"json",
        data:{message},
        success:function(response){
            renderMessages();
        }
    })
})

function renderMessages()
{
    $("#messages").html("")
    $.ajax({
        url:"routeur.php?function=getMessages",
        dataType:"json",
        success:function(response){
            response.forEach(message => {
                $("#messages").append(`<p>${message.message}</p>`)
            });
        }
    })
}