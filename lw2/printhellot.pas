PROGRAM PrintHelloName(INPUT, OUTPUT);
USES Dos;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  IF Length(GetEnv('QUERY_STRING')) <= 5
  THEN
    WRITELN('Hello, Anonymous!')
  ELSE
    WRITELN('Hello, ', Copy(GetEnv('QUERY_STRING'), 6, Length(GetEnv('QUERY_STRING')) - 5), '!')
END.
