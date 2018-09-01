var req = new XMLHttpRequest();
var jsonData;
var albumIndex;
var images = [];
var noOfImages;

req.open('GET','functions/fetch_data.php');
req.onload=function(){
    jsonData=JSON.parse(req.response);
}
req.send();

function onload()
{
    document.getElementById('album_list').style.display='block';
    document.getElementById('slide_show').style.display='none';
}

function albumClick(x)
{
    albumIndex=x;
    document.getElementById('album_list').style.display='none';
    document.getElementById('slide_show').style.display='block';

    noOfImages=jsonData.albums[albumIndex].photos.length;
    
    var i;

    for(i=0;i<noOfImages;i++)
    {
        images[i]=jsonData.albums[albumIndex].photos[i].source;
    }
                
    console.log("Album Index : "+albumIndex);
    console.log("Number of images : "+noOfImages);
                
    console.log(images[1]);
    document.getElementById('slide').src=images[0];
    if(noOfImages==1)
    {
        document.getElementById('btnNext').style.display='none';
        document.getElementById('btnPrev').style.display='none';
    }
}
var i=0;
function changeImg(x)
{
    if(x==+1){
        if(i==noOfImages-1){
            i=0;
        }
        else{
            i+=x;
        }
    }
    if(x==-1){
        if(i==0){
            i=noOfImages-1;
        }
        else{
            i+=x;
        }
    }
    console.log("Image Index : "+i);
    document.getElementById('slide').src=images[i];
}