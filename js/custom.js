const tbody = document.querySelector(".listar_usuarios");

const cadForm = document.getElementById("cad-usuario-form");

const edForm = document.getElementById("ed-usuario-form");

const msgAlerta = document.getElementById("msgAlert");

const msgAlerta2 = document.getElementById("msgAlert2");

const msgAlertaedit = document.getElementById("msgAlertedit");

const cadModal = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));


const listusuarios = async (page)=>{
   const dados = await fetch("./list.php?page="+page);
   const resposta = await dados.text();
   tbody.innerHTML = resposta;
// ,await é para aguardar 
};
listusuarios(1);


// aqui cadastro


cadForm.addEventListener('submit', async (e)=> {
   e.preventDefault();
   const dadosform =  new FormData(cadForm);
   dadosform.append("add", 1);
   // console.log(dadosform);
   const dados = await fetch("cadastro.php", {
      method: "POST",
      body: dadosform,
   });

   const resposta = await dados.json();
   if (resposta['erro']){
      msgAlerta.innerHTML = resposta['msg'];
   }else{
      msgAlerta.innerHTML = resposta['msg'];
      // cadModal.reset();
      document.getElementById('nome').value="";
      document.getElementById('email').value="";
      document.getElementById('telefone').value="";
      cadModal.hide();
      listusuarios(1);
   };
});

async function visUsuario(id){
   // console.log(); await aguarda 
   const dados1 = await fetch('visualizar.php?id=' + id);
   const resposta = await dados1.json();
   console.log(resposta);
   if(resposta['erro']){
      msgAlerta.innerHTML = resposta['msg'];
   }else{
      const visModal = new bootstrap.Modal(document.getElementById("visUsuarioModal"));
      visModal.show();
      document.getElementById("idusuario").innerHTML = resposta['dados'].id;
      document.getElementById("nomeusuario").innerHTML = resposta['dados'].nome;
      document.getElementById("emailusuario").innerHTML = resposta['dados'].email;
      document.getElementById("telusuario").innerHTML = resposta['dados'].telefone;
      document.getElementById("sexusuario").innerHTML = resposta['dados'].n_sexo;

   }

};


async function editUsuario(id){
   const dados2 = await fetch('visualizar.php?id=' + id);
   const resposta1 = await dados2.json();
   console.log(resposta1);

   if(resposta1['erro']){
      msgAlerta.innerHTML = resposta1['msg'];
   }else{
      const edModal = new bootstrap.Modal(document.getElementById("edUsuarioModal"));
      edModal.show();
      document.getElementById("editid").value = resposta1['dados'].id;
      document.getElementById("editnome").value = resposta1['dados'].nome;
      document.getElementById("editemail").value = resposta1['dados'].email;
      document.getElementById("edittelefone").value = resposta1['dados'].telefone;
   }
}

edForm.addEventListener('submit', async (e)=> {
   e.preventDefault();
   const dadosform =  new FormData(edForm);
   // dadosform.append("add", 1);
   for (var dados1 of dadosform.entries()){
      console.log(dados1[0]+","+dados1[1]);
   }

   const dados = await fetch("alterar.php", {
      method: "POST",
      body: dadosform,
   });

   const resposta = await dados.json();
   console.log(resposta);
   if (resposta['erro']){
       msgAlertaedit.innerHTML = resposta['msg'];
   }else{
       msgAlertaedit.innerHTML = resposta['msg'];
   //    // cadModal.reset();
   //    // document.getElementById('nome').value="";
   //    // document.getElementById('email').value="";
   //    // document.getElementById('telefone').value="";
   //    cadModal.hide();
       listusuarios(1);
   };
});


async function deleteUsuario(id){
   var confirmar  = confirm("Tem certeza que quer apagar o registro");
   if (confirmar == true){
      // console.log(id);
      const dados = await fetch('apagar.php?id=' + id);
      const resposta = await dados.json();
      // console.log(resposta);
      listusuarios(1);
      if(resposta['erro']){
         msgAlerta2.innerHTML = resposta['msg'];
      }else{
         msgAlerta2.innerHTML = resposta['msg'];
         listusuarios(1);
      }
   }else{
      console.log("Ação de apagar cancelada")
   }

}