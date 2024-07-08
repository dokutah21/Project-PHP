const btn=document.querySelectorAll("button")
// console.log(btn)
btn.forEach(function(button,index){
    button.addEventListener("click",function(event){{
        var btnItem=event.target
        var product=btnItem.parentElement
        
        var productImg=product.querySelector(".boxpro img").src
        var producName=product.querySelector(".ten").innerText
        var productPrice=product.querySelector("strong").innerText
        
        addcart(productImg,producName,productPrice)
    }
        
    })
})
function addcart(productImg,producName,productPrice){
    var addcart=document.createElement("tr")
    var cartItem=document.querySelectorAll("tbody tr")
    
    var trContent='<tr><td><img style="width: 70px; display: flex;justify-content: center;" src="'+productImg+'" alt=""></td><td><a class="ten">'+producName+'</a></td><td> <strong >'+productPrice+'</strong></td><td><input style="width: 30px; outline: none;" type="number" value="1" min="0"></td><td style="cursor: pointer;"><span  class="cart-delete" style="cursor: pointer;">Xóa</span></td></tr>'
    addcart.innerHTML=trContent
    var cartTable=document.querySelector("tbody")
    cartTable.append(addcart)
    cartTotal()
    deleteSP()
    Swal.fire({
        icon: 'success',
        title: 'Đã thêm vào giỏ hàng thành công!',
        showConfirmButton: false,
        timer: 1500
    });
}
// totalPrice
function cartTotal(){
    var cartItem=document.querySelectorAll("tbody tr")

    var totalC=0;
    for(var i=0;i<cartItem.length;i++){
        var inputValue= cartItem[i].querySelector("input").value
        
        var productPrice=cartItem[i].querySelector("strong").innerHTML
        
        totalA=inputValue*productPrice*1000
        // totalB=totalA.toLocaleString('de-DE')
        totalC=totalC+totalA
        totalD=totalC.toLocaleString('de-DE')
        console.log(totalA)
    }
    
    var cartTotalA=document.querySelector(".total p strong")
    cartTotalA.innerHTML=totalD
    // var cartPrice=document.querySelector(".cart-icon span")
    // cartPrice.innerHTML=totalD
    inputchange()
    
}
//deleteSp
function deleteSP(){
    var cartItem=document.querySelectorAll("tbody tr")
    for(var i=0;i<cartItem.length;i++){
        var productT=document.querySelectorAll(".cart-delete")
        productT[i].addEventListener("click",function(event){
            var cartDelete=event.target
            var cartItem1=cartDelete.parentElement.parentElement
            cartItem1.remove()
            cartTotal()
        })
    }
    
      // Xử lý event update số lượng sản phẩm
}
// Xử lý event update số lượng sản phẩm
function inputchange(){
    var cartItem=document.querySelectorAll("tbody tr")
    for(var i=0;i<cartItem.length;i++){
        var inputValue=cartItem[i].querySelector("input")
        inputValue.addEventListener("change",function(){
            deleteSP()
        cartTotal();
        })
        
    }
}
// 
const cartX=document.querySelector(".closeShopping")
const cartShow=document.querySelector(".spc")
cartShow.addEventListener("click",function(){
    document.querySelector(".cart").style.display="block"
})
cartX.addEventListener("click",function(){
     document.querySelector(".cart").style.display="none"
 })
// 


 var muahang=document.querySelectorAll('button')
 console.log(muahang)
 muahang.forEach(function(item){
    item.addEventListener("click",function(e){  
        var itemX = e.target
        var item = itemX.parentElement
        var img = item.querySelector('.boximg img').src
        var name = item.querySelector('.ten').innerHTML
        var price = item.querySelector('strong').innerHTML
        sendproduct(img,name,price)
        console.log(price)
    })
 })
 function sendproduct(img, name, price) {
    try {
      var listItem = localStorage.getItem("listItem") ? JSON.parse(localStorage.getItem("listItem")) : [];
      
      listItem.push({
        img: img,
        name: name,
        price: price,
        amount: 1
      });
      localStorage.setItem("listItem", JSON.stringify(listItem));
    } catch (error) {
      console.log("Error saving product:", error);
    }
  }

  // var muahang=document.querySelectorAll('.ct a')
  // muahang.forEach(function(item){
  //    item.addEventListener("click",function(e){  
  //        var itemX = e.target
  //        var item = itemX.parentElement
  //        var img = item.querySelector('.boximg img').src
  //        var name = item.querySelector('.ten').innerHTML
  //        var price = item.querySelector('strong').innerHTML
  //        chitietProduct(img,name,price)
  //        console.log(price)
  //    })
  // })
  // function chitietProduct(img, name, price) {
  //    try {
  //      var listItem = localStorage.getItem("productPrice") ? JSON.parse(localStorage.getItem("productPrice")) : [];
       
  //      listItem.push({
  //        img: img,
  //        name: name,
  //        price: price,
  //        amount: 1
  //      });
  //      localStorage.setItem("productPrice", JSON.stringify(listItem));
  //    } catch (error) {
  //      console.log("Error saving product:", error);
  //    }
  //  }