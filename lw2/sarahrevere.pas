PROGRAM SarahRevere(INPUT, OUTPUT);
USES Dos;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  IF GetEnv('QUERY_STRING') = 'lanterns=1'
  THEN
    WRITELN('The british are coming by sea')
  ELSE
    IF GetEnv('QUERY_STRING') = 'lanterns=2'
    THEN
      WRITELN('The british are coming by land')
    ELSE
      WRITELN('Sarah did not say')
END.
