# Определение персонажей
define mc = Character("Алекс", color="#c8a2c8")
define fr = Character("Друг", color="#a2c8c8")
define dl = Character("Незнакомец", color="#c8a2a2")

# Определение музыки
define audio.drug = "music/drug.mp3"
define audio.eaz = "music/eaz.mp3"
define audio.neit = "music/neit.mp3"
define audio.shok = "music/shok.mp3"
# Переменная для очков
default points = 0

# Начало игры
label splashscreen:
    scene back
    with Pause(1)

    show text "American Bishoujo представляет..." with dissolve
    with Pause(2)

    hide text with dissolve
    with Pause(1)



    # Сцена 1: Школа
    scene kls
    show gg at left
    play music eaz
    mc "Привет! Меня зовут Алекс. Сегодня я хочу рассказать тебе одну историю."
    mc "Это история о том, как важно делать правильный выбор."

    # Сцена 2: Разговор с другом
    show hehe at right
    fr "Эй, Алекс! Ты слышал? Кто-то в школе предлагает попробовать что-то новое..."
    mc "Что? Что именно?"
    fr "Ну, знаешь... наркотики. Говорят, это круто."
    play music shok
    # Первый выбор
    menu:
        "Это опасно! Ты же понимаешь, что это может разрушить твою жизнь?":
            $ points += 1
            mc "Это опасно! Ты же понимаешь, что это может разрушить твою жизнь?"
            fr "Да, ты прав... Наверное, не стоит."
        "Может, попробуем? Вдруг это действительно круто?":
            $ points -= 1
            mc "Может, попробуем? Вдруг это действительно круто?"
            fr "Ну... ладно, давай попробуем."

    # Сцена 3: Встреча с негативным персонажем
    scene prk
    show dllr at right
    show gg at left
    dl "Эй, парень! Хочешь попробовать что-то новое? Это бесплатно, только для тебя."
    play music drug

    # Второй выбор
    menu:
        "Нет, спасибо. Я знаю, что это опасно.":
            $ points += 1
            mc "Нет, спасибо. Я знаю, что это опасно."
            dl "Ну и ладно, твой выбор."
        "Давай, я попробую!":
            $ points -= 1
            mc "Давай, я попробую!"
            dl "Вот это по-нашему!"

    # Сцена 4: Развязка
    scene kls
    show gg at center

    # Определение концовки
    if points >= 2:
        jump good_ending
    elif points == 1:
        jump neutral_ending
    else:
        jump bad_ending

# Хорошая концовка
label good_ending:
    play music eaz
    mc "Я рад, что смог устоять перед соблазном. Наркотики — это не путь к счастью."
    mc "Если ты или твои друзья столкнулись с такой проблемой, обязательно поговори с кем-то, кому доверяешь."
    scene black
    "Вы сделали правильные выборы! Береги себя и своих близких."
    return

# Нейтральная концовка
label neutral_ending:
    play music neit
    mc "Я почти попал в беду, но вовремя остановился. Наркотики — это опасно."
    mc "Нужно быть осторожнее в будущем."
    scene black
    "Вы были близки к ошибке, но смогли остановиться. Будьте внимательны!"
    return

# Плохая концовка
label bad_ending:
    scene vhod
    play music drug
    hide gg 
    mc "Я попал в беду... Наркотики разрушили мою жизнь."
    mc "Пожалуйста, не повторяйте моих ошибок."
    scene black
    "Вы сделали неправильные выборы. Помните, что наркотики — это путь в никуда."
    return
