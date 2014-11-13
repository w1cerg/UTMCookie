libs
====
Class for store UTM from URL (GET)

Notice: must be init before any output is sent to the browser

Methods:

first() -
  return array with first utm
  
last() -
  return array with last utm
  
readURL() -
  try to get UTM from URL and store in cookie

Если utm присутствуют в URL, они записываются в куки и являются первыми и последними метками.

Если пользователь входит на сайт в дальнейшем с новыми метками - последние метки перезаписываются, при условии что utm_source в URL отличается от того что в последних сохраненных метках.

Запись в куки меток происходит только если присутствует utm_source, даже если остальных меток нет или есть не все.

Если пользователь войдет в дальнейшем с тем же utm_source и с более полным набором меток (не знаю возможно ли такое вообще), то ничего не произойдет (новые метки НЕ добавятся в куки).
