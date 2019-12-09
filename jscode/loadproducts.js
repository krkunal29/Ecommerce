function loadproducts(id)
{
var html = '<option value="">Select Products</option>';
for(let k of productList.keys()){
  var products = productList.get(k);
  html +='<option value='+products.productId+'>'+products.productName+'</option>';
}
$("#ProductId"+id).html(html);
}
