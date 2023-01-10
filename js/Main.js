var price = document.getElementsByClassName("Price");
var oldprice = document.getElementsByClassName("oldPrice");



function currency() {
    var select = document.getElementById("Currency");
    var value = select.options[select.selectedIndex].value;
    if (value == "Dollar") {
        for (let i = 0; i < price.length; i++) {
            p = price[i].innerHTML;
            p = (parseFloat(p) / 10)
            p = p.toString() + " $"
            price[i].innerHTML = p;
        }
        for (let i = 0; i < oldprice.length; i++) {
            oldp = oldprice[i].innerHTML;
            oldp = (parseFloat(oldp) / 10)
            oldp = oldp.toString() + " $"
            oldprice[i].innerHTML = oldp;
        }
    } else {
        for (let i = 0; i < price.length; i++) {
            p = price[i].innerHTML;
            p = (parseFloat(p) * 10)
            p = p.toString() + " MAD"
            price[i].innerHTML = p;
        }
        for (let i = 0; i < oldprice.length; i++) {
            oldp = oldprice[i].innerHTML;
            console.log(oldp);
            oldp = (parseFloat(oldp) * 10)
            oldp = oldp.toString() + " MAD"
            oldprice[i].innerHTML = oldp;
        }
    }
}

$(document).ready(function () {
    let To = null
    let ab=0
    let ac=0
    let khdma=''
    $(".test1").on('click', function () {
        let val = $(this).val();
        
        let title = val.split(',')[0]
        let img = val.split(',')[1]
        let price = val.split(',')[2]
        khdma +=title+","+price+"*"
        let frstDiv = document.createElement('div')
        frstDiv.className = 'product-widget';
        let secDiv = document.createElement('div')
        secDiv.className = 'product-img';
        let imgE = document.createElement('img')
        imgE.src = "data:image/jpg;charset=utf8;base64," + img + ""
        secDiv.append(imgE)
        let ThirdDiv = document.createElement('div')
        ThirdDiv.className = 'product-body';
        let h3 = document.createElement('h3')
        h3.className = 'product-name';
        h3.innerHTML = title
        let h4 = document.createElement('h4')
        h4.className = 'product-price Price';
        h4.innerHTML = price + "DH"
        ThirdDiv.append(h3)
        ThirdDiv.append(h4)
        let button = document.createElement('button')
        button.className = 'delete'
        let i = document.createElement('i')
        i.className = 'fa fa-close'
        button.append(i)
        
        frstDiv.append(secDiv)
        frstDiv.append(ThirdDiv)
        frstDiv.append(button)
        $(".cart-list").append(frstDiv)
        
        To = To + parseFloat(h4.innerHTML)
        To = To
        let itemnu=document.getElementById('itemnu')
        
        ab=ab+1
        itemnu.innerHTML=ab
        let cartN=document.getElementById('cart-notif')
        ac=ac+1
        cartN.innerHTML=ac


        let span = document.getElementById("Total")
        let a = span.textContent = To + "DH"
        

    })
    $("#khdma").on('click', function () {
        location.href=this.href+'?khdma='+khdma;return false;
    })
})
function retrieveRecords() {
    var records = window.sessionStorage.getItem('carte');
}
function showcart() {
    document.getElementById("cart-dropdown").classList.toggle("dropdown-show");
}
function shwlogout() {
    document.getElementById("logout-btn").classList.toggle("dropdown-show");
}