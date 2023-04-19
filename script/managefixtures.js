let edit = document.getElementById('editFixture')
let del = document.getElementById('deleteFixture')
let save = document.getElementById('save')
let add = document.getElementById('add')
edit.addEventListener('click',function() {
    let fixture=edit.parentElement.parentElement
    let logo = fixture.getElementsByTagName('img')[0]
    logo.style.display='none'
    edit.style.display='none'
    del.style.display='none'
    save.style.display='block'
    let Arr = Array.from(fixture.getElementsByTagName('h3'))
    Arr.map(a=> a.style.display='none')
    let inp = Array.from(fixture.getElementsByTagName('input'))
    inp.map(a=>a.style.display='block')
    inp[0].placeholder=logo.src;
    for(let i=0;i<Arr.length;i++){
        inp[i+1].placeholder= Arr[i].innerText;
    }
    
    
})
save.addEventListener('click',saveclick)
function saveclick () {
    let fixture=this.parentElement.parentElement
    let logo = fixture.getElementsByTagName('img')[0]
    logo.style.display='block'
    edit.style.display='block'
    del.style.display='block'
    
    save.style.display='none'
    let Arr = Array.from(fixture.getElementsByTagName('h3'))
    Arr.map(a=> a.style.display='block')
    let inp = Array.from(fixture.getElementsByTagName('input'))
    inp.map(a=>a.style.display='none')
    console.log(inp[0].value)
    logo.src = `url("${URL.createObjectURL(fixture.getElementsByTagName('input')[0])})"`

    for(let i=0;i<Arr.length;i++){
        Arr[i].innerText= inp[i+1].value;
    }

    /**
     * Send to database
     */
}
add.addEventListener('click',function () {
    let newfix = document.getElementById('fixtureadd').cloneNode(true)
    document.getElementById('fixtureadd').parentElement.append(newfix)
    console.log(newfix);
    newfix.addEventListener('click',saveclick)
    newfix.style.display='flex'
    
    let fixture=edit.parentElement.parentElement
    let logo = fixture.getElementsByTagName('img')[0]
    logo.style.display='none'
    edit.style.display='none'
    del.style.display='none'
    save.style.display='block'
    let Arr = Array.from(fixture.getElementsByTagName('h3'))
    Arr.map(a=> a.style.display='none')
    let inp = Array.from(fixture.getElementsByTagName('input'))
    inp.map(a=>a.style.display='block')
    inp[0].placeholder=logo.src;
    for(let i=0;i<Arr.length;i++){
        inp[i+1].placeholder= Arr[i].innerText;
    }

  })