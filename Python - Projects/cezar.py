def caesar_cipher_encrypt(plaintext, shift, mod = 26):
    result = ""
    index_list = []
    for char in plaintext:
        if char.isalpha():
            ascii_offset = ord('A') if char.isupper() else ord('a')
            encrypted_char = chr((ord(char) - ascii_offset + shift) % mod + ascii_offset)
            result += encrypted_char
            index_list.append(str((ord(encrypted_char) - ascii_offset)).zfill(2))
        else:
            result += char
            index_list.append("--")
    
    return result, index_list

def caesar_cipher_decrypt(ciphertext, shift,mod = 26):
    result = ""
    index_list = []
    for char in ciphertext:
        if char.isalpha():
            ascii_offset = ord('A') if char.isupper() else ord('a')
            decrypted_char = chr((ord(char) - ascii_offset - shift) % mod + ascii_offset)
            result += decrypted_char
            index_list.append(str((ord(decrypted_char) - ascii_offset)).zfill(2))
        else:
            result += char
            index_list.append("--")
    
    return result, index_list

name = "ermal"

print("Encryption:")
for key in range(26):
    encrypted_name, indices = caesar_cipher_encrypt(name, key)
    print(f"Key {key}: {encrypted_name} ({', '.join(indices)})")

print("\nDecryption:")
for key in range(26):
    decrypted_name, indices = caesar_cipher_decrypt(name, key)
    print(f"Key {key}: {decrypted_name} ({', '.join(indices)})")
