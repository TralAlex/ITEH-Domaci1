$("#dodajForm").submit(function(event){
    event.preventDefault(); //da se ne refreshuje stranica
    console.log("Dodaj je pokrenuto");
    const $form = $(this);
    const $inputs = $form.find("input, select, button");
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);
    debugger;
    request = $.ajax({ //ajax prihvata json objekat
        url: 'handler/add.php',
        type: 'post',
        data: serijalizacija
    });

    request.done(function(response, txtStatus, jqXHR){
        console.log(response);
        if(response !== "Error"){
            console.log("You have added device successfuly");
            window.location.reload(true);
        }else{
            console.log(""+response);
        }
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila: "+textStatus, errorThrown);
    });

});

function deleteProduct(id){
    console.log("Brisanje je pokrenuto", id);
    
    request = $.ajax({ //ajax prihvata json objekat
        url: 'handler/delete.php',
        type: 'post',
        data: { id }
    });

    request.done(function(response, txtStatus, jqXHR){
        console.log(response);
        if(response !== "Error"){
            console.log("You have removed device successfuly");
            window.location.reload(true);
        }else{
            console.log(""+response);
        }
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila: "+textStatus, errorThrown);
    });

};

function pretrazi() {
    let input = document.getElementById("search");
    let term = input.value.toUpperCase();
    
    request = $.ajax({
        url: 'handler/search.php',
        type: 'post',
        data: { term }
    });
    request.done(function(response, txtStatus, jqXHR){
        console.log(response);
        if(response !== "Error"){
                let table = document.getElementById("tabela");
                let tr = table.getElementsByTagName("tr");
                console.log(tr);
                for (let i = tr.length - 1; i >= 3; i--) {
                    table.getElementsByTagName('tbody')[0].removeChild(tr[i]);
                }
                let array = JSON.parse(response);
                for (let i = 0; i < array.length; i++) {
                    const element = array[i];
                    
                    console.log(child);
                    const child = creteChild(element);
                    const newTag = document.createElement('tr');
                    newTag.innerHTML = child;
                    table.getElementsByTagName('tbody')[0].append(newTag);
                }
        }else{
            console.log(""+response);
        }
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila: "+textStatus, errorThrown);
    });

}


function creteChild(obj) {
    return `
               
                <td>
                    ${obj[0]}
                </td>
                <td>
                    ${obj[10]}
                </td>
                <td>
                    ${obj[1]}
                </td>
                <td>
                    ${obj[2]}
                </td>
                <td>
                    ${obj[3]}
                </td>
                <td>
                    ${obj[4]}
                </td>
                <td>
                    ${obj[5]}
                </td>
                <td>
                    ${obj[6]}
                </td>
                <td><img src="${obj[7]}" alt="Phone" width="50" height="50"></td>
                <td>
                    <button id="btnObrisi" type="button" class="btn btn-success btn-block"
                        onclick='deleteProduct(${obj[0]});'
                        style="background-color: red; border-radius:50px;"><i
                            class="glyphicon glyphicon-minus"></i>
                        Delete
                    </button>
                </td>`;
}