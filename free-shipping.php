{% comment  %}{{ settings.freeshipping }} {% endcomment %}
{% assign MinPrice = settings.freeshipping | plus: 0 %}
{% assign cartPrice = cart.total_price | remove :'00'%}
{% assign cartPrice = cartPrice | plus: 0 %}
{% assign TotalPrice = MinPrice | minus : cartPrice %}

{% assign PercentFlow =100| times : cartPrice %}
{% assign PercentDivision= PercentFlow | divided_by : MinPrice %}


  <div class="cart-uniq-warpper">
{% if  cartPrice < MinPrice %}
  <p class="cart-uniq-number">
    You need Rs. <span class="cart-uniq-numcount">{{ TotalPrice }} </span> away form free shipping.
  </p>
   
  {% else %}
  <p  class="cart-uniq-success">Free Shipping Bar</p>
    {% endif %}
    <div class="cart-uniq-bar">
      <span class="cart-uinq-progress"></span>
    </div>
  </div>
<style>
  .cart-uniq-warpper{
    max-width:100%;
    margin: 0px auto;
  }
  .cart-uniq-bar{
    position: relative;
    background-color: #ccc;
    height: 1rem;
    }
  .cart-uinq-progress{
      position: absolute;
      top: 0px;
      left: 0px;
      min-width: 0px;
      max-width: 100px;
      display: block;
      height:100%;
      background-color: red;
      width:{{PercentDivision}}%;
  }
  .cart-uinq-progress::after{
     content:'';
     width: 15px;
     height: 15px;
    background-color: #ea0101;
    position: absolute;
    right: 0px;
    top: 0px;
  }
  .cart-uniq-success ~ .cart-uniq-bar .cart-uinq-progress{
  background-color:#37d216;
  }
   .cart-uniq-success ~ .cart-uniq-bar .cart-uinq-progress :: after{
  background-color:#2eb511;
  }
</style>




