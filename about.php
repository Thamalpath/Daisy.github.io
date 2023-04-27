<?php
include('includes/header.php'); 
?>

<style>
    
.about-section{
    background: url(about2.jpg) no-repeat left;
    background-size: 55%;
    background-color: #fdfdfd;
    overflow: hidden;
    padding: 100px 0;
}

.inner-container{
    width: 55%;
    float: right;
    background-color: #fdfdfd;
    padding: 150px;
}

.inner-container h1{
    margin-bottom: 30px;
    font-size: 30px;
    font-weight: 900;
}

.text{
    font-size: 18px;
    color: #545454;
    line-height: 30px;
    text-align: justify;
    margin-bottom: 40px;
}

.skills{
    display: flex;
    justify-content: space-between;
    font-weight: 700;
    font-size: 13px;
}

@media screen and (max-width:1200px){
    .inner-container{
        padding: 80px;
    }
}

@media screen and (max-width:1000px){
    .about-section{
        background-size: 100%;
        padding: 100px 40px;
    }
    .inner-container{
        width: 100%;
    }
}

@media screen and (max-width:600px){
    .about-section{
        padding: 0;
    }
    .inner-container{
        padding: 60px;
    }
}
</style>

<div class="about-section mt-5">
    <div class="inner-container">
        <h1>About Us</h1>
        <hr>
        <h2 class="text">
        Hello! We are Daisy’s Wardrobe, we have 1 retail outlet located in Kandy. We have strengthened our presence across the local fashion retail landscape, rapidly expanding to provide lifestyle experiences in a fast-progressing, high-demand retail market. Fully drawing on our industry experience and customer-centricity. Today, guided by an adaptive and future-ready first-generation leadership.
        <br> <br>
        Daisy's Wardrobe is looking to expand further across Sri Lanka’s fashionable, sensible and well-informed target market by integrating our physical stores with digital channels, creating a seamless and engaging customer experience both online and in-store.
        </h2>
        
    </div>
</div>



<?php include('includes/footer.php'); ?>