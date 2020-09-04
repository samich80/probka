const formatRusPhoneNumber = (phone) => {
  const cleaned = (`${phone}`).replace(/\D/g, '');
  const match = cleaned.match(/^(\d)(\d{3})(\d{3})(\d{2})(\d{2})$/);
  if (match?.length === 6) {
    const codeCountry = match[1] === '8' ? match[1] : `+${match[1]}`;
    return `${codeCountry} (${match[2]}) ${match[3]}-${match[4]}-${match[5]}`;
  }

  return phone;
};

const formatRusPhoneNumberForCall = (phone) => {
  let cleaned = (`${phone}`).replace(/\D/g, '');
  if (cleaned?.[0] !== '8') {
    cleaned = `+${cleaned}`;
  }
  return cleaned;
};

const roundToTwoDigits = (num) => (num ? (Math.round((parseFloat(num) + Number.EPSILON) * 100) / 100) : 0);

export {
  formatRusPhoneNumber,
  formatRusPhoneNumberForCall,
  roundToTwoDigits,
};
