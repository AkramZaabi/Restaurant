<template>
    <div class="footer-dark mt-5 footer">
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3 item">
              <h3>Services</h3>
              <ul>
                <li><a href="#">Web design</a></li>
                <li><a href="#">Development</a></li>
                <li><a href="#">Hosting</a></li>
              </ul>
            </div>
            <div class="col-sm-6 col-md-3 item">
              <h3>About</h3>
              <ul>
                <li><a href="#">Company</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Careers</a></li>
              </ul>
            </div>
            <div class="col-md-6 item text">
              <h3>FCfoodie</h3>
              <p style="color: white">
                "Welcome to FCfoodie, where culinary artistry meets a delightful dining experience. Our passion for exceptional flavors, quality ingredients, and warm hospitality is evident in every dish we create. Explore a diverse menu crafted with love, featuring a fusion of international cuisines and local favorites. At [Your Restaurant Name], we believe in bringing people together through the joy of delicious food. Join us on a culinary journey that tantalizes your taste buds and leaves you craving for more. Bon appétit!
              </p>
            </div>
            <div class="col item social">
              <a href="#"><i class="icon ion-social-facebook"></i></a
              ><a href="#"><i class="icon ion-social-twitter"></i></a
              ><a href="#"><i class="icon ion-social-snapchat"></i></a
              ><a href="#"><i class="icon ion-social-instagram"></i></a>
            </div>
          </div>
          <p class="copyright" style="color: white; font-weight: 400">
            Trendy Mode © 2023
          </p>
        </div>
      </footer>
    </div>
  </template>
  
  <script>
  export default {
    name: "Footer-component",
  };
  </script>
  <style scoped>
  .footer-dark {
    padding: 50px 0;
    color: #f0f9ff;
    background-color: #ff9900;
  }
  
  .footer-dark h3 {
    margin-top: 0;
    margin-bottom: 12px;
    font-weight: bold;
    font-size: 16px;
  }
  
  .footer-dark ul {
    padding: 0;
    list-style: none;
    line-height: 1.6;
    font-size: 14px;
    margin-bottom: 0;
  }
  .footer-dark ul a {
    color: inherit;
    text-decoration: none;
    opacity: 0.6;
  }
  
  .footer-dark ul a:hover {
    opacity: 0.8;
  }
  
  @media (max-width: 767px) {
    .footer-dark .item:not(.social) {
      text-align: center;
      padding-bottom: 20px;
    }
  }
  
  .footer-dark .item.text {
    margin-bottom: 36px;
  }
  
  @media (max-width: 767px) {
    .footer-dark .item.text {
      margin-bottom: 0;
    }
  }
  
  .footer-dark .item.text p {
    opacity: 0.6;
    margin-bottom: 0;
  }
  
  .footer-dark .item.social {
    text-align: center;
  }
  
  @media (max-width: 991px) {
    .footer-dark .item.social {
      text-align: center;
      margin-top: 20px;
    }
  }
  
  .footer-dark .item.social > a {
    font-size: 20px;
    width: 36px;
    height: 36px;
    line-height: 36px;
    display: inline-block;
    text-align: center;
    border-radius: 50%;
    box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.4);
    margin: 0 8px;
    color: #fff;
    opacity: 0.75;
  }
  
  .footer-dark .item.social > a:hover {
    opacity: 0.9;
  }
  
  .footer-dark .copyright {
    text-align: center;
    padding-top: 24px;
    opacity: 0.3;
    font-size: 13px;
    margin-bottom: 0;
  }
  </style>
  