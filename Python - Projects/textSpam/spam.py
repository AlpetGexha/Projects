import pyautogui as auto
import time

text = input("shkruani fjalin e spamit: ")

time.sleep(2.5)
while True:
    auto.write(text)
    auto.press('enter')
    time.sleep(2.3)
