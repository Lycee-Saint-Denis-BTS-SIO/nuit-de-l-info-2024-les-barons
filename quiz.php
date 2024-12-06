<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><h1>Quiz</h1>
    <form>
        <label for="question1">Question 1</label><br>
        <input type="radio" name="question1" value="1">Réponse 1<br>
        <input type="radio" name="question1" value="2">Réponse 2<br>
        <input type="radio" name="question1" value="3">Réponse 3<br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>

<script>
    console.log('test');
    document.addEventListener("DOMContentLoaded", function() { 
        document.querySelector('form').addEventListener('submit', function(e){
            e.preventDefault();
            let question1 = document.querySelector('input[name="question1"]:checked').value;
            if (question1==1){
                fetch('process/addQuizPoint.php', {
                    method: 'POST',
                    body: new URLSearchParams({
                        'question1': question1
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
            }
        });
    });

</script>