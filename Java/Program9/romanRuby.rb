class Fixnum
  ROMAN_NUMBERS = {
    1000 => "M",  
     900 => "CM",  
     500 => "D",  
     400 => "CD",
     100 => "C",  
      90 => "XC",  
      50 => "L",  
      40 => "XL",  
      10 => "X",  
        9 => "IX",  
        5 => "V",  
        4 => "IV",  
        1 => "I",  
        0 => "",  
  }
  def roman
    return '' if self == 0
    ROMAN_NUMBERS.each do |value, letter|
      return ( letter * (self / value)) << (self % value).roman if value <= self
    end
    return (self % value).roman
  end
end

puts 65065.roman