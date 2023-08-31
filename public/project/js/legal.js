const termsBtn = document.getElementById('terms-btn');
const termsP = document.getElementById('terms-of-use');

const  policyBtn = document.getElementById('privacy-btn');
const policyP = document.getElementById('privacy-policy');

const riskBtn = document.getElementById('risk-btn');
const riskP = document.getElementById('risk-disclosure');


termsBtn.addEventListener('click',function(){
    termsP.style.display = 'block';
    policyP.style.display = 'none';
    riskP.style.display = 'none';
});
policyBtn.addEventListener('click',function(){
    policyP.style.display = 'block';
    termsP.style.display = 'none';
    riskP.style.display = 'none';
    });
riskBtn.addEventListener('click',function(){
    riskP.style.display = 'block';
    termsP.style.display = 'none';
    policyP.style.display = 'none';
    });