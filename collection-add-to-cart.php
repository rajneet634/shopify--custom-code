{% assign available = product.selected_or_first_available_variant.available %}


<div class="collection-add-to-cart">
  {% for variant in product.variants %}
  <input type="hidden" id="variantegetid" value="{{ variant.id }}"/>
  
  {% endfor %}
  <button type="button"  name="add" id="collection-cart-{{ product.id }}">
    {% if available == true %}
    Add to cart  
    {% else %}
      soldout
  {% endif %}
  </button>
   
</div>

<script>
    jQuery(document).on('click', '#collection-cart-{{ product.id }}', function() {
   let varianteget = $(this).parents('.collection-add-to-cart').find('#variantegetid').val();
     
   
   let formobj = {
      quantity: 1,
      id: varianteget
   };

   $.ajax({
      type: 'post',
      url: '/cart/add.js',
      cache: false,
      data: formobj,
      dataType: 'json',
      success: function(data) {
         console.log('success');
         $('.cartbtnicon').click();
         $('cart-drawer').removeClass('is-empty'); 
         $('.drawer__inner-empty').hide();
         $('cart-drawer').load(location.href + " #CartDrawer"); 
         $('#cart-icon-bubble').load(location.href + " #cart-icon-bubble");
      },
      error: function(xhr, ajaxOption, throwError) {
         console.log('error');
      }
   });
});


</script>
