// console.log(11111111);
$('.changeTask').click(() => {
  taskTotal();
  // console.log(e.target);
});
$('.changePartjob').click(() => {
  partJobTotal();
});

function taskTotal() {
  console.log(event.target);
}

function partJobTotal() {
  console.log(event.target);
}
function isEmpty(data) {
  let results = {};
  data.map(function (elem, index) {
    results[elem.name] = elem.value;
    if (elem.value === '') {
      $(`#addEmpForm label`)[index].classList.add('input-err');
    } else {
      $(`#addEmpForm label`)[index].classList.remove('input-err');
    }
  });
}
