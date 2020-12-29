function validation(mdp1, mdp2) {
  if (mdp1.value == '' || mdp2.value == '') {
    alert('Tous les champs ne sont pas remplis');
    mdp1.focus();
    return false;
    }
  else if (mdp1.value != mdp2.value) {
    alert('Ce ne sont pas les mêmes mots de passe!');
    mdp1.focus();
    return false;
    }
  else if (mdp1.value == mdp2.value) {
    return true;
    }
  else {
    mdp1.focus();
    return alse;
    }
  }