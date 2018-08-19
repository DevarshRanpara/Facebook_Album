
    var jsonData;
    function onload()
    {
        var jsonData=JSON.parse('<?php echo $_SESSION['josnData']; ?>');
        console.log(jsonData);
        // console.log(jsonData);
    }
    function albumClick(x)
    {
        alert(x);
    }