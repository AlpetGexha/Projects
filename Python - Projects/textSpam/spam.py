import pyautogui as auto
import time

text = input("shkruani fjalin e spamit: ")

time.sleep(0.000002)
while True:
    auto.write(text)
    auto.press('enter')
    time.sleep(0.000001)
