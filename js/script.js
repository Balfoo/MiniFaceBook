//Filtre de la recherche d'amis
let saisieFiltreAmis = document.getElementById('saisieFiltreAmis')
saisieFiltreAmis.addEventListener('keyup', filterAmis)

function filterAmis() {
    //Récupérer la saisie dans le champ.
    let nomRecherche = saisieFiltreAmis.value.toUpperCase()

    //Récupérer l'ul
    let ulFiltreAmis = document.getElementById('ulFiltreAmis')
    //Récupérer les li de l'ul
    let liFiltreAmis = ulFiltreAmis.querySelectorAll('li.filacc-amis_liste')

    for (let i = 0; i<liFiltreAmis.length; i++) {
        let spanNom = liFiltreAmis[i].getElementsByClassName('filacc-amis_nom')[0] //Récupere les noms présent dans la liste

        if (spanNom.innerHTML.toUpperCase().indexOf(nomRecherche) > -1) { //Si l'un des noms de la liste correpsond au nom saisi
             liFiltreAmis[i].style.display = ''                                  //La méthode indexOf() renvoie le premier indice pour lequel on trouve un élément donné dans un tableau. Si l'élément cherché n'est pas présent dans le tableau, la méthode renverra -1.
        } else {
            liFiltreAmis[i].style.display = 'none'       
        }
    }
}