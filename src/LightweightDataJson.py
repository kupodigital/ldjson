class LightweightDataJson:
    
    def decode(data: str) -> list:
        lines = data.split("\n")
        header = []
        result = []

        # Encontrar a primeira linha não vazia para extrair os cabeçalhos
        for line in lines:
            if line.strip():  # Verificar se a linha não está vazia
                header = [item.split(":")[0] for item in map(str.strip, line.strip("{}").split("\t"))]
                break

        # Processar os dados após o cabeçalho
        for i in range(1, len(lines)):
            if not lines[i].strip():  # Ignorar linhas vazias
                continue
            values = list(map(str.strip, lines[i].strip("{}").split("\t")))
            obj = {}

            for j in range(len(header)):
                if header[j]:
                    obj[header[j]] = values[j]

            result.append(obj)

        return result
    
    @staticmethod
    def encode(data: list) -> str:
        header = []
        body = ""
        t = 0

        for value in data:
            body += "\x0A{\x09"
            sorted_value = dict(sorted(value.items()))
            
            for subKey, subValue in sorted_value.items():
                if t == 0:
                    header.append(f"{subKey}:{type(subValue).__name__}")
                body += f"{subValue}\x09"

            t += 1
            body += "}"

        header_str = "\x09".join(header)
        return f"{{\x09{header_str}\x09}}{body}"