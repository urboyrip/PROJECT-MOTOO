var productList = document.getElementById('productList')
var listArray = []
var text = "Filtered: "
var checkboxes = document.querySelectorAll('.checkbox');

for (var checkbox of checkboxes){
    checkbox.addEventListener('click', function(){
        if(this.checked == true){
            listArray.push(this.value)
            productList.innerHTML =  text + listArray.join(', ');
        }else{
            listArray = listArray.filter(e =>e !== this.value);
            productList.innerHTML = text +listArray.join('+')
        }
    })
}



