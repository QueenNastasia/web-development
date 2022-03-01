PROGRAM PrintParametrs(INPUT, OUTPUT);
USES Dos;

FUNCTION GetQueryStringParametr(Key: STRING): STRING;
VAR
  Str: STRING;
  Index, Count: INTEGER;
BEGIN
  Str := GetEnv('QUERY_STRING');
  IF Pos(Key, Str) = 0
  THEN
    GetQueryStringParametr := ''
  ELSE
    BEGIN
      Index := Pos(Key, Str);
      Delete(Str, 1, Index + Length(Key));
      Count := Pos('&', Str);
      IF Count <> 0
      THEN
        Delete(Str, Count, Length(Str) - Count + 1);
      GetQuerystringParametr := Str
    END;
END;

BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First_name: ', GetQueryStringParametr('first_name'));
  WRITELN('Last_name: ', GetQueryStringParametr('last_name'));
  WRITELN('Age: ', GetQueryStringParametr('age'))
END.
